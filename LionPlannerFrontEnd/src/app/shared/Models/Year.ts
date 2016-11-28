import {Semester} from "./Semester";

export class Year {
    constructor(
        public semester1: Semester,
        public semester2: Semester
    ) {}
}