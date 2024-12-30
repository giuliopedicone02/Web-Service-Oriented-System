package edu.unict.wsos.veicoli.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import edu.unict.wsos.veicoli.Data.VeicoliRepository;
import edu.unict.wsos.veicoli.Model.Veicoli;

@Controller
public class VeicoliController {
    private final VeicoliRepository repo;

    public VeicoliController(VeicoliRepository repo) {
        this.repo = repo;
    }

    @GetMapping("/")
    public String getVeicoli(Model model) {
        model.addAttribute("veicoli", repo.findAll());
        return "index";
    }

    @PostMapping("/add")
    public String addVeicolo(Veicoli veicolo) {
        repo.save(veicolo);
        return "redirect:/";
    }

    @PostMapping("/delete")
    public String deleteVeicolo(Long id) {
        repo.deleteById(id);
        return "redirect:/";
    }

    @PostMapping("/update")
    public String findVeicolo(Model model, Long id) {
        model.addAttribute("veicoli", repo.getReferenceById(id));
        return "modifica";
    }

}
