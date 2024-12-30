package edu.unict.wsos.universita.universita.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import edu.unict.wsos.universita.universita.data.DipartimentiRepository;
import edu.unict.wsos.universita.universita.model.Dipartimenti;

@Controller
public class DipartimentiController {
    private final DipartimentiRepository repo;

    public DipartimentiController(DipartimentiRepository repo) {
        this.repo = repo;
    }

    @GetMapping("/")
    public String getDipartimenti(Model model) {
        model.addAttribute("dipartimenti", repo.findAll());
        return "index";
    }

    @PostMapping("/create")
    public String addDipartimento(Dipartimenti dip) {
        repo.save(dip);
        return "redirect:/";
    }

    @PostMapping("/elimina")
    public String eliminaDipartimento(Long id) {
        repo.deleteById(id);
        return "redirect:/";
    }

    @PostMapping("/modifica")
    public String modificaDipartimento(Model model, Long id) {
        model.addAttribute("dipartimenti", repo.getReferenceById(id));
        return "modifica";
    }

    @PostMapping("/update")
    public String update(Dipartimenti dip) {
        repo.save(dip);
        return "redirect:/";
    }

}
