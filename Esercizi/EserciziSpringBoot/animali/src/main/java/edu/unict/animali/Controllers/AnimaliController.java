package edu.unict.animali.Controllers;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;

import edu.unict.animali.Models.Animali;
import edu.unict.animali.Repositories.AnimaliRepository;
import edu.unict.animali.Repositories.PadroniRepository;

@Controller
public class AnimaliController {

    private final AnimaliRepository animaliRepository;
    private final PadroniRepository padroniRepository;

    public AnimaliController(AnimaliRepository animaliRepo, PadroniRepository padroniRepository) {
        this.animaliRepository = animaliRepo;
        this.padroniRepository = padroniRepository;
    }

    @GetMapping("/animali")
    public String getAnimali(Model model) {
        model.addAttribute("animali", animaliRepository.findAll());
        model.addAttribute("padroni", padroniRepository.findAll());
        return "animali/list";
    }

    @PostMapping("/animali/new")
    public String addAnimali(Animali animale) {
        animaliRepository.save(animale);
        return "redirect:/animali";
    }

    @GetMapping("/animali/{id}/delete")
    public String getAnimali(@PathVariable Long id) {
        animaliRepository.deleteById(id);
        return "redirect:/animali";
    }

    @GetMapping("/animali/{id}/edit")
    public String getAnimali(Model model, @PathVariable Long id) {
        model.addAttribute("animali", animaliRepository.getReferenceById(id));
        model.addAttribute("padroni", padroniRepository.findAll());
        return "animali/edit";
    }

}
