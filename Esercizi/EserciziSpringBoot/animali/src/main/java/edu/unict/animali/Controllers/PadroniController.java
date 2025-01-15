package edu.unict.animali.Controllers;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;

import edu.unict.animali.Models.Padroni;
import edu.unict.animali.Repositories.PadroniRepository;

@Controller
public class PadroniController {

    private final PadroniRepository repo;

    public PadroniController(PadroniRepository repo) {
        this.repo = repo;
    }

    @GetMapping("/padroni")
    public String getPadroni(Model model) {
        model.addAttribute("padroni", repo.findAll());
        return "padroni/list";
    }

    @PostMapping("/padroni/new")
    public String create(Padroni padrone) {
        repo.save(padrone);
        return "redirect:/padroni";
    }

    @GetMapping("/padroni/{id}/delete")
    public String eliminaPadrone(@PathVariable Long id) {
        repo.deleteById(id);
        return "redirect:/padroni";
    }

    @GetMapping("/padroni/{id}/edit")
    public String modificaPadrone(Model model, @PathVariable Long id) {
        model.addAttribute("padroni", repo.getReferenceById(id));
        return "padroni/edit";
    }

}
