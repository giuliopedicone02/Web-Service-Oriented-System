package edu.unict.wsos.aeroporti.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;

import edu.unict.wsos.aeroporti.Model.Tratta;
import edu.unict.wsos.aeroporti.Repository.CompagniaRepository;
import edu.unict.wsos.aeroporti.Repository.TrattaRepository;

@Controller
public class TrattaController {
    private final TrattaRepository tratta;
    private final CompagniaRepository compagnia;

    public TrattaController(TrattaRepository tratta, CompagniaRepository compagnia) {
        this.tratta = tratta;
        this.compagnia = compagnia;
    }

    @GetMapping("/tratte")
    public String getTratte(Model model) {
        model.addAttribute("tratte", tratta.findAll());
        model.addAttribute("compagnie", compagnia.findAll());
        return "tratta/list";
    }

    @GetMapping("/tratte/new")
    public String creaTratta(Model model) {
        model.addAttribute("tratte", new Tratta());
        model.addAttribute("compagnie", compagnia.findAll());
        return "tratta/edit";
    }

    @PostMapping("/tratte/new")
    public String tratta(Tratta obj) {
        tratta.save(obj);
        return "redirect:/tratte";
    }

    @GetMapping("/tratte/{id}/delete")
    public String deleteTratta(@PathVariable Long id) {
        tratta.deleteById(id);
        return "redirect:/tratte";
    }

    @GetMapping("/tratte/{id}/edit")
    public String editTratta(@PathVariable Long id, Model model) {
        model.addAttribute("tratte", tratta.getReferenceById(id));
        model.addAttribute("compagnie", compagnia.findAll());
        return "tratta/edit";
    }

}
