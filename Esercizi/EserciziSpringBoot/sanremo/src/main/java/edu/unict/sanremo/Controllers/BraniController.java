package edu.unict.sanremo.Controllers;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import edu.unict.sanremo.Models.Brani;
import edu.unict.sanremo.Repositories.ArtistiRepository;
import edu.unict.sanremo.Repositories.BraniRepository;

@Controller
public class BraniController {
    private final BraniRepository braniRepository;
    private final ArtistiRepository artistiRepository;

    public BraniController(BraniRepository braniRepository, ArtistiRepository artistiRepository) {
        this.braniRepository = braniRepository;
        this.artistiRepository = artistiRepository;
    }

    @GetMapping("/brani")
    public String addBrano(Model model) {
        model.addAttribute("brani", braniRepository.findAll());
        model.addAttribute("artisti", artistiRepository.findAll());
        return "brani/list";
    }

    @PostMapping("/brani/create")
    public String addBrano(Brani brano) {
        braniRepository.save(brano);
        return "redirect:/brani";
    }

    @PostMapping("/brani/delete")
    public String deleteBrano(Long id) {
        braniRepository.deleteById(id);
        return "redirect:/brani";
    }

    @PostMapping("/brani/update")
    public String editBrano(Model model, Long id) {
        model.addAttribute("brano", braniRepository.getReferenceById(id));
        model.addAttribute("artisti", artistiRepository.findAll());
        return "brani/edit";
    }

    @PostMapping("/brani/searchSong")
    public String searchSong(Model model, String title) {
        model.addAttribute("brani", braniRepository.findByTitleContainingIgnoreCase(title));
        model.addAttribute("artisti", artistiRepository.findAll());
        return "brani/list";
    }

}
