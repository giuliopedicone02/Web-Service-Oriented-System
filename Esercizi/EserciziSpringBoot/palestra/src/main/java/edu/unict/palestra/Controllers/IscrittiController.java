package edu.unict.palestra.Controllers;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import edu.unict.palestra.Models.Iscritti;
import edu.unict.palestra.Models.Palestra;
import edu.unict.palestra.Repositories.IscrittiRepsoitory;
import edu.unict.palestra.Repositories.PalestraRepository;

@Controller
public class IscrittiController {
    private final IscrittiRepsoitory iscrittiRepsoitory;
    private final PalestraRepository palestraRepository;

    public IscrittiController(IscrittiRepsoitory iscrittiRepsoitory, PalestraRepository palestraRepository) {
        this.iscrittiRepsoitory = iscrittiRepsoitory;
        this.palestraRepository = palestraRepository;
    }

    @GetMapping("/iscritti")
    public String getIscritti(Model model) {
        model.addAttribute("iscritti", iscrittiRepsoitory.findAll());
        model.addAttribute("palestre", palestraRepository.findAll());

        return "iscritti/list";
    }

    @PostMapping("/iscritti/create")
    public String postIscritti(Iscritti iscritto) {
        iscrittiRepsoitory.save(iscritto);
        return "redirect:/iscritti";
    }

    @PostMapping("/iscritti/delete")
    public String deleteIscritto(Long id) {
        iscrittiRepsoitory.deleteById(id);
        return "redirect:/iscritti";
    }

    @PostMapping("/iscritti/edit")
    public String editIscritto(Model model, Long id) {
        model.addAttribute("iscritti", iscrittiRepsoitory.getReferenceById(id));
        model.addAttribute("palestre", palestraRepository.findAll());
        return "iscritti/edit";
    }

    @PostMapping("/iscritti/findByPalestra")
    public String findByPalestra(Model model, Long palestraId) {
        Palestra palestra = palestraRepository.getReferenceById(palestraId);
        model.addAttribute("iscritti", iscrittiRepsoitory.findByPalestraId(palestra));
        model.addAttribute("palestre", palestraRepository.findAll());
        return "iscritti/list";
    }

}
