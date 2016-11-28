import {Component, OnInit, AfterViewInit} from '@angular/core';
import {PlannerService} from "../planner.service";
import {CourseGroup} from "../../../shared/Models/CourseGroup";

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

  constructor(private _plannerService: PlannerService) {
    _plannerService.GetCoursesOffered().subscribe(response => {
      this.courseGroups = response;
    });

    $('.collapse').collapse('hide');
  }

  onCollapse() {
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
