import {Choice} from "./Choice";
import {Question} from "./Question";

export class NextSemester {
    constructor(
        public classes: Choice[],
        public alternativeClasses: Choice[],
        public questions: Question[],
        public semester: string,
        public year: number,
        public creditTotal: number
    ) {}
}