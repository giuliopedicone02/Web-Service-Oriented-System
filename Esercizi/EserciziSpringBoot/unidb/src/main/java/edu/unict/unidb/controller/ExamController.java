package edu.unict.unidb.controller;

import java.util.List;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import edu.unict.unidb.model.Exam;
import edu.unict.unidb.repositories.ExamRepository;

@Controller
public class ExamController {
    private final ExamRepository repo;

    public ExamController(ExamRepository repo) {
        this.repo = repo;
    }

    @GetMapping("/exam")
    public String getExams(Model model) {
        List<Exam> allExams = repo.findAll();
        model.addAttribute("exams", allExams);

        int count = 0;
        for (Exam elem : allExams) {
            count += elem.getCfu();
        }

        model.addAttribute("countCFU", count);

        return "exam/list";
    }

    @PostMapping("/exam/create")
    public String addExam(Exam exam) {
        repo.save(exam);
        return "redirect:/exam";
    }

    @PostMapping("/exam/delete")
    public String deleteExam(Long id) {
        repo.deleteById(id);
        return "redirect:/exam";
    }

    @PostMapping("/exam/edit")
    public String editExam(Model model, Long id) {
        model.addAttribute("exam", repo.getReferenceById(id));
        return "exam/edit";
    }

}
