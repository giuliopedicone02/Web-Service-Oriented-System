package edu.unict.wsos.aeroporti.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;

import edu.unict.wsos.aeroporti.Model.Compagnia;
import edu.unict.wsos.aeroporti.Repository.CompagniaRepository;

@Controller
public class CompagniaController {
    private final CompagniaRepository repo;

    public CompagniaController(CompagniaRepository repo) {
        this.repo = repo;
    }

    @GetMapping("/compagnie")
    public String getCompagnie(Model model) {
        model.addAttribute("compagnie", repo.findAll());
        return "compagnia/list";
    }

    @GetMapping("/compagnie/new")
    public String createCompagnia(Model model) {
        model.addAttribute("compagnie", new Compagnia());
        return "compagnia/edit";
    }

    @PostMapping("/compagnie/new")
    public String addCompagnia(Compagnia compagnia) {
        repo.save(compagnia);
        return "redirect:/compagnie";
    }

    @GetMapping("/compagnie/{id}/delete")
    public String deleteCompagnia(@PathVariable Long id) {
        repo.deleteById(id);
        return "redirect:/compagnie";
    }

    @GetMapping("/compagnie/{id}/edit")
    public String editCompagnia(@PathVariable Long id, Model model) {
        model.addAttribute("compagnie", repo.getReferenceById(id));
        return "compagnia/edit";
    }

}
