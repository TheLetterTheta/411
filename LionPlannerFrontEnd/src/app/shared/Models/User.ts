/**
 * Created by Coffin1 on 11/9/16.
 */
export class User {
    constructor(
        public userId: string,
        public wNumber: string,
        public firstName: string,
        public lastName: string,
        public actEnglish: number,
        public actMath: number,
        public actReading: number,
        public actScience: number,
        public email: string,
        public gpa: number
    ) {}
}