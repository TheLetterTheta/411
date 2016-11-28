import {Course} from "./Course";

export class Choice {
    constructor(
        public chosenClass: Course,
        public classOptions: Course[]
    ) {}
}