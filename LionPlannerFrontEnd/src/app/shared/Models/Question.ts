import {Course} from "./Course";

export class Question {
    constructor(
        public classChosen: Course,
        public options: Course[],
    ) {}
}