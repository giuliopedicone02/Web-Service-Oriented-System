package edu.unict.dmi.wsos.esami.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import edu.unict.dmi.wsos.esami.Data.EsamiRepository;
import edu.unict.dmi.wsos.esami.Model.Esami;

@Controller
public class EsamiController {

    private final EsamiRepository repo;

    public EsamiController(EsamiRepository repo) {
        this.repo = repo;
    }

    @GetMapping("/")
    public String getEsami(Model model) {
        model.addAttribute("esami", repo.findAll());
        return "index";
    }

    @PostMapping("/create")
    public String creaEsame(Esami esame) {
        repo.save(esame);
        return "redirect:/";
    }

    @PostMapping("/delete")
    public String deleteEsame(Long id) {
        repo.deleteById(id);
        return "redirect:/";
    }

    @PostMapping("/update")
    public String updateEsame(Model model, Long id) {
        model.addAttribute("esame", repo.getReferenceById(id));
        return "modifica";
    }

}
