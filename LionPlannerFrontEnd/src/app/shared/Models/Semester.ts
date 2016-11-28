import {Choice} from "./Choice";
import {Question} from "./Question";

export class Semester {
    constructor(
        public classes: Choice[],
        public semester: string,
        public year: number,
        public creditTotal: number,
        public questions: Question[]
    ) {}
}