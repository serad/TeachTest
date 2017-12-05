class Course {
	constructor() {

		this.id = undefined;
		this.courseName = undefined;
		this.definition = '';
		this.startDate = undefined;
		this.endDate = undefined;
		this.level = undefined;
		this.active = 0;
	}

	save() {
		var error = false;
		for (var property in this) {
			if (this.hasOwnProperty(property)) {
				if (typeof this[property] == 'undefined' && property != 'id') {
					error = true;
					if (property == 'level')
						$("select[name='" + property + "']").parent().addClass('invalid')
					else
						$("input[name='" + property + "']").addClass('invalid')
				}
			}
		}
		if (error) {
			Materialize.toast('Check form', 4000, 'red');
			return false;
		}
		$.post('/course/save', {
			course: this
		}, function (data) {
			if (data.result == 'ok') {
				Materialize.toast('Saved!', 4000, 'green') // 4000 is the duration of the toast
			} else {
				Materialize.toast('Something was worng', 4000) // 4000 is the duration of the toast
			}
		}, 'json');
	}

	initByJson(dbCourse) {
		this.id = dbCourse.courseId;
		console.log(dbCourse.courseName);
		this.courseName = dbCourse.courseName;
		this.definition = dbCourse.definition;
		this.startDate = (dbCourse.startDate).replace(/-/g, "/");
		this.endDate = (dbCourse.endDate).replace(/-/g, "/");
		this.level = dbCourse.level;
		this.active = dbCourse.active;
	}

	initForm() {
		//Asignamos el objeto this a that para poder utilizarlo dentro de la funcion change de jquery
		var that = this;
		var courseId = $('#course_id');
		courseId.val(this.id);

		var courseName = $('#course_name');
		courseName.val(this.courseName);
		courseName.change(function (elem) {
			that.courseName = elem.target.value;
		});

		var definition = $('#definition');
		definition.val(this.definition);
		definition.change(function (elem) {
			that.definition = elem.target.value;
		});
		var dateStart = $('#date_start');
		if (typeof this.startDate != 'undefined')
			dateStart.pickadate('picker').set('select', this.startDate ? new Date(this.startDate) : '');
		dateStart.change(function (elem) {
			that.startDate = $(elem.target).pickadate('picker').get('select', 'yyyy-mm-dd');
		});
		var dateEnd = $('#date_end');
		if (typeof this.endDate != 'undefined')
			dateEnd.pickadate('picker').set('select', this.startDate ? new Date(this.endDate) : '');
		dateEnd.change(function (elem) {
			that.endDate = $(elem.target).pickadate('picker').get('select', 'yyyy-mm-dd');
		});

		var level = $('#level')
		level.val(this.level);
		level.change(function (elem) {
			that.level = elem.target.value
		});
		$('#level').material_select();

		var active = $('#active');
		active.prop('checked', parseInt(this.active));
		active.change(function (elem) {
			that.active = elem.target.checked ? 1 : 0;
		});

		$("input").change(function (elem) {
			$(elem.target).removeClass('invalid');
		});
		$("select").change(function (elem) {
			$(elem.target).parent().removeClass('invalid');
		})
	}

}