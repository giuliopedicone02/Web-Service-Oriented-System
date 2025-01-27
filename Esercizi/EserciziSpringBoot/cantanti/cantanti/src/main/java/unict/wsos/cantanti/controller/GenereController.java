package unict.wsos.cantanti.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import unict.wsos.cantanti.model.Genere;
import unict.wsos.cantanti.repository.GenereRepository;

@Controller
public class GenereController {

    private final GenereRepository repog;

    public GenereController(GenereRepository repog) {
        this.repog = repog;
    }

    @GetMapping("/")
    public String getHome(Model model) {
        return "index";
    }

    @GetMapping("/genere")
    public String getGeneri(Model model) {
        model.addAttribute("generi", repog.findAll());
        return "genere/list";
    }

    @GetMapping("/genere/inserimento")
    public String getins(Model model) {
        model.addAttribute("genere", new Genere());
        return "genere/edit";
    }

    @PostMapping("/genere/modifica")
    public String getedit(Model model, long id) {
        model.addAttribute("genere", repog.getReferenceById(id));
        return "genere/edit";
    }

    @PostMapping("/genere/update")
    public String update(Genere obj) {
        repog.save(obj);
        return "redirect:/genere";
    }

    @PostMapping("/genere/elimina")
    public String delete(long id) {
        repog.deleteById(id);
        return "redirect:/genere";
    }

}
