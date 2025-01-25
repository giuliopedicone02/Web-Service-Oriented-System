package edu.unict.palestra.Controllers;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import edu.unict.palestra.Models.Palestra;
import edu.unict.palestra.Repositories.PalestraRepository;

@Controller
public class PalestraController {
    private final PalestraRepository repo;

    public PalestraController(PalestraRepository repo) {
        this.repo = repo;
    }

    @GetMapping("/palestre")
    public String getPalestre(Model model) {
        model.addAttribute("palestre", repo.findAll());
        return "palestre/list";
    }

    @PostMapping("/palestre/create")
    public String createPalestra(Palestra palestra) {
        repo.save(palestra);
        return "redirect:/palestre";
    }

    @PostMapping("/palestre/delete")
    public String deletePalestra(Long id) {
        repo.deleteById(id);
        return "redirect:/palestre";
    }

    @PostMapping("/palestre/edit")
    public String editPalestra(Model model, Long id) {
        model.addAttribute("palestre", repo.getReferenceById(id));
        return "palestre/edit";
    }

}
