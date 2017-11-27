function Course () {

	this.id = undefined;
	this.courseName = undefined;
	this.definition = undefined;
	this.startDate = undefined;
	this.endDate = undefined;
	this.level = undefined;
	this.active = undefined;

	this.initByJson = function ( dbCourse ) {
		this.id = dbCourse.courseId;
		this.courseName = dbCourse.courseName;
		this.definition = dbCourse.definition;
		this.startDate = dbCourse.startDate;
		this.endDate = dbCourse.endDate;
		this.level = dbCourse.level;
		this.active = dbCourse.active;
	}

}

