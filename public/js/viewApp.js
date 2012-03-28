$(document).ready(function () {
	MyError = Backbone.Model.extend({
		defaults: {
			errorId: null,
			logType: null,
			projectName: null,
			environment: null,
			priority: null,
			errorNumber: null,
			message: null,
			file: null,
			line: null,
			context: null,
			stacktrace: null,
			timestamp: null,
			priorityName :null,
			displayDetails: false,
			
		},
	
		initialize: function() {
			var tempArray = eval(this.get('stacktrace'));
			var stackArray = [];
			for(index in tempArray) {
				var line = new StackTraceLine(tempArray[index]);
				stackArray.push(line);
			}
			this.set('stacktrace', stackArray);
			
			var stackTraceHtml = '';
			var test = stackArray;
			var stackTraceTemplate = _.template($('#stackTraceLineTemplate').html());
			for(var line in test) {
				stackTraceHtml += stackTraceTemplate(test[line].toJSON());
			}
			this.set('stacktraceHtml', stackTraceHtml);
		},
		
		toggleDetails: function() {
			this.set('displayDetails',!this.get('displayDetails'));
		},
	});
	
	StackTraceLine = Backbone.Model.extend({
		defaults: {
			args: null,
			errClass: null,
			errFunciton: null,
			type: null,
			file: null,
			line: null,
		},
		
		initialize: function() {
			this.set('errClass', this.get('class'));
			this.set('errFunction', this.get('function'));
		}
	});
	
	ErrorList = Backbone.Collection.extend({
		model: MyError,
		
		comparator: function(myerror) {
			return myerror.get('errorId');
		},
		
		getRecords: function(projects, page) {
			request = {};
			request.projects = projects;
			request.page = page;
			$.ajax({
				myParent: this,
				type: "POST",
				url: "/ajax/get-rows",
				data: request,
			}).done(function(response) {
				this.myParent.destroyAll();
				this.myParent.reset(response);
			});
			
		},
		
		destroyAll: function (options) {
			while (this.models.length > 0) {
				this.models[0].destroy(options);
			}
		},
	});
	
	ErrorLineView = Backbone.View.extend({
		tagName: "tr",
		template: _.template($('#errorLineTemplate').html()),
		events: {
			"click" : "toggleDetails",
		},
	
		toggleDetails: function() {
			this.model.toggleDetails();
			if(this.model.get('displayDetails')) {
				$('#topInfo').hide('slide');
			} else {
				$('#topInfo').show('slide');
			}
		},
		
		initialize: function() {
			this.model.bind('change', this.render, this);
			this.model.bind('destroy', this.remove, this);
		},
		
		render: function() {
			$(this.el).html(this.template(this.model.toJSON()));
			return this;
		},
		
		remove: function() {
			$(this.el).remove();
		},
		
		clear: function() {
			this.model.destroy();
		},
	});
	
	ErrorDetailsView = Backbone.View.extend({
		tagName: "div",
		template: _.template($('#errorDetailsTemplate').html()),

		events: {
			"click .backLink" : "toggleDetails",
		},
		
		initialize: function() {
			this.model.bind('change', this.render, this);
			this.model.bind('destroy', this.remove, this);
		},
		
		render: function() {
			if(!this.model.get('displayDetails')) {
				$(this.el).html('');
				return this;
			}
			$(this.el).html(this.template(this.model.toJSON()));
			return this;
		},
		
		remove: function() {
			$(this.el).remove();
		},
		
		toggleDetails: function() {
			this.model.toggleDetails();
			if(this.model.get('displayDetails')) {
				$('#topInfo').hide('slide');
			} else {
				$('#topInfo').show('slide');
			}
		},
		
		clear: function() {
			this.model.destroy();
		},
	});
	
	AppView = Backbone.View.extend({
		el: $('#errorApp'),
		lineList: new ErrorList(),
		
		initialize: function() {
			this.lineList.bind('add',   this.addLine, this);
			this.lineList.bind('reset', this.addLineAll, this);
		},
		
		events: {
		},
		
		addLine: function(myerror) {
			var view = new ErrorLineView({model: myerror});
			$("#errorListTable").append(view.render().el);
			var view = new ErrorDetailsView({model: myerror});
			$("#errorDetails").append(view.render().el);
			
		},
		
		addLineAll: function() {
			this.lineList.each(this.addLine);
		},
	});
	window.App = new AppView;
	
});

function submitForm() {
	var projects = [];
	$("#entryRequest input:checkbox:checked").each(function(a, b) {
		projects.push($(this).val());
	});
	window.App.lineList.getRecords(projects, $('#entryRequest #page').val());
}

function nextPage() {
	$('#entryRequest #page').val(parseInt($('#entryRequest #page').val())+1);
	submitForm();
}

function prevPage() {
	if($('#entryRequest #page').val() > 1)
		$('#entryRequest #page').val(parseInt($('#entryRequest #page').val())-1);
	else 
		$('#entryRequest #page').val(1);
	submitForm();
}

function gotoPage(page) {
	
}