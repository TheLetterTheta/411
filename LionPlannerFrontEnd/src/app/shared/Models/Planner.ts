import {Semester} from "./Semester";
import {NextSemester} from "./NextSemester";

export class Planner {
    constructor(
        public upcomingSemester: NextSemester,
        public followingSemesters: Semester[]
    ) {}
}