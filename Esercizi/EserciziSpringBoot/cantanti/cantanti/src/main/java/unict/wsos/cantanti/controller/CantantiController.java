package unict.wsos.cantanti.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import unict.wsos.cantanti.model.Cantanti;
import unict.wsos.cantanti.model.Genere;
import unict.wsos.cantanti.repository.CantantiRepository;
import unict.wsos.cantanti.repository.GenereRepository;

@Controller
public class CantantiController {

    private final CantantiRepository repoc;
    private final GenereRepository repog;

    public CantantiController(CantantiRepository repoc, GenereRepository repog) {
        this.repoc = repoc;
        this.repog = repog;
    }

    @GetMapping("/cantanti")
    public String getGeneri(Model model) {
        model.addAttribute("cantanti", repoc.findAll());
        model.addAttribute("generi", repog.findAll());
        return "cantanti/list";
    }

    @GetMapping("/cantanti/inserimento")
    public String getins(Model model) {
        model.addAttribute("cantante", new Cantanti());
        model.addAttribute("generi", repog.findAll());
        return "cantanti/edit";
    }

    @PostMapping("/cantanti/modifica")
    public String getedit(Model model, long id) {
        model.addAttribute("cantante", repoc.getReferenceById(id));
        model.addAttribute("generi", repog.findAll());
        return "cantanti/edit";
    }

    @PostMapping("/cantanti/update")
    public String update(Cantanti obj) {
        repoc.save(obj);
        return "redirect:/cantanti";
    }

    @PostMapping("/cantanti/elimina")
    public String delete(long id) {
        repoc.deleteById(id);
        return "redirect:/cantanti";
    }

    @PostMapping("/cantanti/findByGenere")
    public String findByGenere(Model model, Long genereId) {
        Genere genere = repog.getReferenceById(genereId);
        model.addAttribute("cantanti", repoc.findByGenereId(genere));
        model.addAttribute("generi", repog.findAll());
        return "cantanti/list";
    }

}
