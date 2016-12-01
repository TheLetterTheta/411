import {Component, OnInit, AfterViewInit} from '@angular/core';
import {PlannerService} from "../planner.service";
import {CourseGroup} from "../../../shared/Models/CourseGroup";
import {Course} from "../../../shared/Models/Course";

declare var $: any;

@Component({
  selector: 'lion-classes-offered',
  templateUrl: './classes-offered.component.html',
  styleUrls: ['./classes-offered.component.css']
})
export class ClassesOfferedComponent {
  private courseGroups: CourseGroup[];
  private index: number = 0;
  private loading: boolean = true;
  private selectedCourse = new Course(3, 4.0, 2.0, "CMPS 161 - ALGORITHM DESIGN AND IMPLEMENTATION I");

  constructor(private _plannerService: PlannerService) {
    _plannerService.GetCoursesOffered().subscribe(response => {
      this.courseGroups = response;
    });

    $('.collapse').collapse('hide');
  }

  changeCourse(course: string) {
    this.selectedCourse.name = course;

    window.scrollTo(0, 0);
  }

  ngAfterViewInit() {
    setTimeout(() => {
      $('.collapse').collapse('hide');
    }, 100);

    setTimeout(() => {
      this.loading = false;
    }, 2000);
  }


}
