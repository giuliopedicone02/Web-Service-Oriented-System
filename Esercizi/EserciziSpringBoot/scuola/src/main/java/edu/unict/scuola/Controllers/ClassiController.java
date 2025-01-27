package edu.unict.scuola.Controllers;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import edu.unict.scuola.Models.Classi;
import edu.unict.scuola.Repositories.ClassiRepository;

@Controller
public class ClassiController {
    private final ClassiRepository repo;

    public ClassiController(ClassiRepository repo) {
        this.repo = repo;
    }

    @GetMapping("/classi")
    public String getClassi(Model model) {
        model.addAttribute("classi", repo.findAll());
        return "classi/list";
    }

    @PostMapping("/classi/create")
    public String addClasse(Classi classe) {
        repo.save(classe);
        return "redirect:/classi";
    }

    @PostMapping("/classi/delete")
    public String deleteClassi(Long id) {
        repo.deleteById(id);
        return "redirect:/classi";
    }

    @PostMapping("/classi/edit")
    public String deleteClassi(Model model, Long id) {
        model.addAttribute("classe", repo.getReferenceById(id));
        return "classi/edit";
    }

}
