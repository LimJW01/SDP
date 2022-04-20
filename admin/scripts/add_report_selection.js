const report_category = document.getElementById("report-category");
report_category.addEventListener("change", function(e) {
    var report_type = report_category.value;
    $("#report-list").load("load_report_list.php", {
        report_type: report_type
    });
});

// https://pretagteam.com/question/disable-weekends-on-html-5-input-type-date
// const calendar = document.getElementById("appointment-date");
// calendar.addEventListener("input", function(e) {
//     const doctor = document.getElementById("doctor-name");
//     var doctor_id = doctor.value;
//     if (doctor_id) {
//         var date = new Date(this.value).toLocaleDateString();
//         var day = new Date(this.value).getUTCDay();
//         var sunday = 0;
//         if([sunday].includes(day)){
//             e.preventDefault();
//             this.value = "";
//             alert("Appointment on Sunday is not allowed");
//         } else {
//             $("#appointment-time").load("add_time_slot.php", {
//                 doctor_id: doctor_id,
//                 date: date,
//                 day: day
//             });
//         } 
//     } else {
//         alert("Please select a doctor first");
//         calendar.value = "";
//     }
// });