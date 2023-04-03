function change_tab1(v){
  document.getElementById("student_tab").className = (v == "s")?"nav-link active":"nav-link";
  document.getElementById("faculty_tab").className = (v == "f")?"nav-link active":"nav-link";
  document.getElementById("add_student_tab").className = (v == "as")?"nav-link active":"nav-link";
  document.getElementById("add_faculty_tab").className = (v == "af")?"nav-link active":"nav-link";
  document.getElementById("add_department_tab").className = (v == "ad")?"nav-link active":"nav-link";
}