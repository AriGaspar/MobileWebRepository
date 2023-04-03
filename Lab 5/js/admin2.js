document.getElementById('student_tab').addEventListener('click', function () {
    change_tab_2("Students" , false , false ,true, false, false ,false);
});
document.getElementById('faculty_tab').addEventListener('click', function () {
    change_tab_2("Faculty" , false , false ,false, true, false ,false);
});
document.getElementById('add_student_tab').addEventListener('click', function () {
    change_tab_2("Add Student" , false , true ,false, false, false ,false);
});
document.getElementById('add_faculty_tab').addEventListener('click', function () {
    change_tab_2("Add Faculty" , true , false ,false, false, false ,false);
});
document.getElementById('add_department_tab').addEventListener('click', function () {
    change_tab_2("Add Deparment" , false , false ,false, false, true ,false);
});
function change_tab_2(subtitle , add_faculty , add_student , students , faculty , dep , extraspace){
    document.getElementById("subtitle").innerHTML = subtitle;
    document.getElementById("add_faculty").hidden = !add_faculty;
    document.getElementById("add_student").hidden = !add_student;
    document.getElementById("students").hidden = !students;
    document.getElementById("faculty").hidden = !faculty;
    document.getElementById("department").hidden = !dep;
    document.getElementById("extraspace").hidden = !extraspace;
}