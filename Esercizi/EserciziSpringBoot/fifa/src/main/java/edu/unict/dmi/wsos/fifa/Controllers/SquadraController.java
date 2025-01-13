package edu.unict.dmi.wsos.fifa.Controllers;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;

import edu.unict.dmi.wsos.fifa.Models.Squadra;
import edu.unict.dmi.wsos.fifa.Repositories.SquadraRepository;

@Controller
public class SquadraController {

    private final SquadraRepository repo;

    public SquadraController(SquadraRepository repo) {
        this.repo = repo;
    }

    @GetMapping("/squadra")
    public String getSquadra(Model model) {
        model.addAttribute("squadre", repo.findAll());
        return "squadra/list";
    }

    @GetMapping("/squadra/new")
    public String creaSquadra(Model model) {
        model.addAttribute("squadre", new Squadra());
        return "squadra/edit";
    }

    @PostMapping("/squadra")
    public String create(@ModelAttribute Squadra squadra, Model model) {
        repo.save(squadra);
        return "redirect:/squadra";
    }

    @GetMapping("/squadra/{id}/delete")
    public String delete(@PathVariable Long id) {
        repo.deleteById(id);
        return "redirect:/squadra";
    }

    @GetMapping("/squadra/{id}/edit")
    public String edit(@PathVariable Long id, Model model) {
        model.addAttribute("squadre", repo.getReferenceById(id));
        return "squadra/edit";
    }

}
