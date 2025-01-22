package edu.unict.unidb.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import edu.unict.unidb.model.Student;
import edu.unict.unidb.repositories.ExamRepository;
import edu.unict.unidb.repositories.StudentRepository;

@Controller
public class StudentController {
    private final StudentRepository studentRepository;
    private final ExamRepository examRepository;

    public StudentController(StudentRepository studentRepository, ExamRepository examRepository) {
        this.studentRepository = studentRepository;
        this.examRepository = examRepository;
    }

    @GetMapping("/students")
    public String getStudents(Model model) {
        model.addAttribute("students", studentRepository.findAll());
        model.addAttribute("exams", examRepository.findAll());
        return "student/list";
    }

    @PostMapping("/students/create")
    public String postMethodName(Student student) {
        studentRepository.save(student);
        return "redirect:/students";
    }

    @PostMapping("/students/delete")
    public String deleteStudent(Long id) {
        studentRepository.deleteById(id);
        return "redirect:/students";
    }

    @PostMapping("/students/edit")
    public String editStudent(Model model, Long id) {
        model.addAttribute("student", studentRepository.getReferenceById(id));
        model.addAttribute("exams", examRepository.findAll());
        return "student/edit";
    }

}
