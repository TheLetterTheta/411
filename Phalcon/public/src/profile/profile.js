export class Profile {
    activate() {
        $.ajax({
            type:'GET',
            url: "http://localhost/411/phalcon/public/home/session",
            success: function(data){
                console.log(data[0]);
                if(data[0] == '['){
                    window.location='#home';
                }
            }
        });
    }
}
