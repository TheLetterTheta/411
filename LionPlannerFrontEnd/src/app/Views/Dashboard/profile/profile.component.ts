import {Component, OnInit, AfterViewInit} from '@angular/core';
import {User} from "../../../shared/Models/User";
import {UserService} from "../../Login/user.service";

declare var $: any;

@Component({
  selector: 'lion-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.css']
})
export class ProfileComponent {

  private percentComplete: number;
  private numCredits: number;
  private _user: User;
  private isLoading: boolean = true;

  constructor(private _userService: UserService) {
    this.numCredits = 90;
    this.percentComplete = this.numCredits / 120 * 100;
    _userService.GetUserProfile().subscribe(user => {
      this._user = user;
      this.isLoading = false;
      this.enablePieChart();
    });
    _userService.GetUserMajors().subscribe(majors => {

    });
    _userService.GetUserMinors().subscribe(minors => {

    })
  }

  enablePieChart() {
    $(function () {
      setTimeout(() => {
        $('.min-chart#chart-sales').easyPieChart({
          scaleColor: false,
          trackColor: 'rgba(0,0,0,0.1)',
          barColor: '#4caf50',
          lineWidth: 6,
          lineCap: 'butt',
          onStep: function (from, to, percent) {
            $(this.el).find('.percent').text(Math.round(percent));
          }
        });
        //update
        var percentage = $('#percentage').val();
        $('.min-chart#chart-sales').data('easyPieChart').update(percentage);
      });
    });
  }
}
