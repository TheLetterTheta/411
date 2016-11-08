import {Component, OnInit, AfterViewInit} from '@angular/core';

declare var jQuery: any;

@Component({
  selector: 'lion-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.css']
})
export class ProfileComponent implements AfterViewInit {

  private percentComplete: number;
  private numCredits: number;


  constructor() {
    this.numCredits = 90;
    this.percentComplete = this.numCredits / 120 * 100;
  }

  ngAfterViewInit() {

    var pb = jQuery("#progressBar").kendoProgressBar({
      min: 0,
      max: 100,
      type: "percent",
      animation: {
        duration: 1000
      }
    }).data("kendoProgressBar");

    pb.progressStatus.text("Empty");

    pb.value(jQuery("#percentage").val());
  }

}
