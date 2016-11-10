import {Component, OnInit, AfterViewInit} from '@angular/core';
import {User} from "../../../shared/Models/User";

declare var $: any;

@Component({
  selector: 'lion-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.css']
})
export class ProfileComponent implements AfterViewInit {

  private percentComplete: number;
  private numCredits: number;
  private _user: User;

  constructor() {
    this.numCredits = 90;
    this.percentComplete = this.numCredits / 120 * 100;
  }

  ngAfterViewInit() {

    var pb = $("#progressBar").kendoProgressBar({
      min: 0,
      max: 100,
      type: "percent",
      animation: {
        duration: 1000
      }
    }).data("kendoProgressBar");


    $(function () {
      $('.min-chart#chart-sales').easyPieChart({
        barColor: "#4caf50",
        onStep: function (from, to, percent) {
          $(this.el).find('.percent').text(Math.round(percent));
        }
      });
    });

    pb.progressStatus.text("Empty");

    pb.value(jQuery("#percentage").val());
  }

}
