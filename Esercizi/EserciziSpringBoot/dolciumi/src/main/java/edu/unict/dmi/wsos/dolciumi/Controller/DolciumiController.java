package edu.unict.dmi.wsos.dolciumi.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import edu.unict.dmi.wsos.dolciumi.Data.DolciumiRepository;
import edu.unict.dmi.wsos.dolciumi.Model.Dolciumi;

@Controller
public class DolciumiController {
    private final DolciumiRepository repo;

    public DolciumiController(DolciumiRepository repo) {
        this.repo = repo;
    }

    @GetMapping("/")
    public String getDolci(Model model) {
        model.addAttribute("dolci", repo.findAll());
        return "index";
    }

    @PostMapping("/add")
    public String addDolci(Dolciumi obj) {
        repo.save(obj);
        return "redirect:/";
    }

    @PostMapping("/delete")
    public String eliminaDolce(Long id) {
        repo.deleteById(id);
        return "redirect:/";
    }

    @PostMapping("/update")
    public String aggiornaDolce(Model model, Long id) {
        model.addAttribute("dolci", repo.getReferenceById(id));
        return "modifica";
    }

}
