import { Component, OnInit, AfterViewInit } from '@angular/core';
import {PlannerService} from "../planner.service";
import { Planner } from "../../../shared/Models/Planner";
import {Semester} from "../../../shared/Models/Semester";
import {Year} from "../../../shared/Models/Year";
import {Question} from "../../../shared/Models/Question";
import {NgForm} from "@angular/forms";

declare var $: any;

@Component({
  selector: 'lion-planner',
  templateUrl: './planner.component.html',
  styleUrls: ['./planner.component.css']
})
export class PlannerComponent {

    private _semesters: Semester[] = new Array<Semester>();
    private _planner: Planner;
    private _years: Year[] = new Array<Year>();
    private isLoading: boolean = true;
    private questionnaireNeeded: boolean = false;
    private questionnaireNeededForUpcoming: boolean = false;
    private questionnaireNeededForFollowing: boolean = false;
    private showQuestions: boolean = true;
    private questions: Question[] = new Array<Question>();

    constructor(private _plannerService: PlannerService) {
        _plannerService.GetPlanner()
            .subscribe(planner => {
                console.log(planner);
                this._planner = planner;
                this.combineSemesters();
                this.isQuestionnaireNeededForUpcomingSemester();
                this.isQuestionnaireNeededForRemainingSemesters();
                if(this.questionnaireNeededForFollowing || this.questionnaireNeededForUpcoming) {
                    this.questionnaireNeeded = true;
                    setTimeout(() => {
                        this.isLoading = false;
                    }, 2000);
                    this.showQuestions = true;
                } else {
                    this.calculateCreditTotal();
                    setTimeout(() => {
                        this.isLoading = false;
                    }, 2000);
                }
            });
        //this.enableSelect();
    }

    enableSelect() {
        setTimeout(() => {
            $('.mdb-select').material_select();
        }, 3000);
    }

    onSubmit(form: NgForm) {
        this.calculateCreditTotal();
        this.questionnaireNeeded = false;
    }

    isQuestionnaireNeededForUpcomingSemester() {
        var classes = this._planner.upcomingSemester.classes;
        var questions = new Array<Question>();
        for(var i = 0; i < classes.length; i++) {
            if(classes[i].classOptions.length > 1) {
                this.questionnaireNeededForUpcoming = true;
                questions.push(new Question(classes[i].chosenClass, classes[i].classOptions));
            }
        }
        this._planner.upcomingSemester.questions = questions;
    }

    isQuestionnaireNeededForRemainingSemesters() {
        var semesters = this._planner.followingSemesters;
        for(var i = 0; i < semesters.length; i++) {
            var questions = new Array<Question>();
            for(var j = 0; j < semesters[i].classes.length; j++) {
                if(semesters[i].classes[j].classOptions.length > 1) {
                    this.questionnaireNeededForFollowing = true;
                    questions.push(new Question(semesters[i].classes[j].chosenClass, semesters[i].classes[j].classOptions));
                }
            }
            semesters[i].questions = questions;
        }
    }

    calculateCreditTotal() {
        for(var k = 0; k < this._planner.upcomingSemester.classes.length; k++) {
            this._planner.upcomingSemester.creditTotal += this._planner.upcomingSemester.classes[k].chosenClass.creditHours;
        }
        var semesters = this._planner.followingSemesters;
        for(var i = 0; i < semesters.length; i++) {
            for(var j = 0; j < semesters[i].classes.length; j++) {
                semesters[i].creditTotal += semesters[i].classes[j].chosenClass.creditHours;
            }
        }
    }

    combineSemesters() {
        var semesters = this._planner.followingSemesters;
        this._years.push(new Year(this._planner.upcomingSemester, semesters[0]));
        for(var i = 0; i < semesters.length; i++) {
            if(i == 2 || i == 4 || i == 6) {
            this._years.push(new Year(semesters[i-1], semesters[i]))
            }
        }
    }
}
