package edu.unict.dmi.wsos.fifa.Controllers;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;

import edu.unict.dmi.wsos.fifa.Models.Giocatori;
import edu.unict.dmi.wsos.fifa.Repositories.GiocatoriRepository;
import edu.unict.dmi.wsos.fifa.Repositories.SquadraRepository;

@Controller
public class GiocatoriController {

    private final GiocatoriRepository repoGiocatori;
    private final SquadraRepository repoSquadra;

    public GiocatoriController(GiocatoriRepository repoGiocatori, SquadraRepository repoSquadra) {
        this.repoGiocatori = repoGiocatori;
        this.repoSquadra = repoSquadra;
    }

    @GetMapping("/giocatori")
    public String getMethodName(Model model) {
        model.addAttribute("giocatori", repoGiocatori.findAll());
        return "giocatori/list";
    }

    @GetMapping("/giocatori/new")
    public String addGiocatori(Model model) {
        model.addAttribute("squadra", repoSquadra.findAll());
        model.addAttribute("giocatori", new Giocatori());
        return "giocatori/edit";
    }

    @GetMapping("/giocatori/{id}/edit")
    public String addGiocatori(@PathVariable Long id, Model model) {
        model.addAttribute("squadra", repoSquadra.findAll());
        model.addAttribute("giocatori", repoGiocatori.getReferenceById(id));
        return "giocatori/edit";
    }

    @GetMapping("/giocatori/{id}/delete")
    public String delete(@PathVariable Long id, Model model) {
        repoGiocatori.deleteById(id);
        return "redirect:/giocatori";
    }

    @PostMapping("/giocatori")
    public String delete(@ModelAttribute Giocatori giocatori, Model model) {
        repoGiocatori.save(giocatori);
        return "redirect:/giocatori";
    }

}
