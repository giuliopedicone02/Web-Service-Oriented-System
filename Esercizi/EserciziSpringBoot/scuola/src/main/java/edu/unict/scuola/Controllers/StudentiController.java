package edu.unict.scuola.Controllers;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import edu.unict.scuola.Models.Classi;
import edu.unict.scuola.Models.Studenti;
import edu.unict.scuola.Repositories.ClassiRepository;
import edu.unict.scuola.Repositories.StudentiRepository;

@Controller
public class StudentiController {
    private final ClassiRepository classiRepository;
    private final StudentiRepository studentiRepository;

    public StudentiController(ClassiRepository classiRepository, StudentiRepository studentiRepository) {
        this.classiRepository = classiRepository;
        this.studentiRepository = studentiRepository;
    }

    @GetMapping("/studenti")
    public String getClassi(Model model) {
        model.addAttribute("classi", classiRepository.findAll());
        model.addAttribute("studenti", studentiRepository.findAll());

        return "studenti/list";
    }

    @PostMapping("/studenti/create")
    public String addClasse(Studenti studenti) {
        studentiRepository.save(studenti);
        return "redirect:/studenti";
    }

    @PostMapping("/studenti/delete")
    public String deleteStudente(Long id) {
        studentiRepository.deleteById(id);
        return "redirect:/studenti";
    }

    @PostMapping("/studenti/edit")
    public String deleteStudenti(Model model, Long id) {
        model.addAttribute("studente", studentiRepository.getReferenceById(id));
        model.addAttribute("classi", classiRepository.findAll());
        return "studenti/edit";
    }

    @PostMapping("/studenti/findByClass")
    public String findByClass(Model model, Long classiId) {
        Classi classe = classiRepository.getReferenceById(classiId);
        model.addAttribute("studenti", studentiRepository.findByClassiId(classe));
        model.addAttribute("classi", classiRepository.findAll());
        return "studenti/list";
    }

}
