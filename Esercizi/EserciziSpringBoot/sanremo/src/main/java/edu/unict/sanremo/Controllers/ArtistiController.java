package edu.unict.sanremo.Controllers;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import edu.unict.sanremo.Models.Artisti;
import edu.unict.sanremo.Repositories.ArtistiRepository;

@Controller
public class ArtistiController {

    private final ArtistiRepository repo;

    public ArtistiController(ArtistiRepository repo) {
        this.repo = repo;
    }

    @GetMapping("/artisti")
    public String getArtisti(Model model) {
        model.addAttribute("artisti", repo.findAll());
        return "artisti/list";
    }

    @PostMapping("/artisti/create")
    public String addArtisti(Artisti artista) {
        repo.save(artista);
        return "redirect:/artisti";
    }

    @PostMapping("/artisti/delete")
    public String deleteArtista(Long id) {
        repo.deleteById(id);
        return "redirect:/artisti";
    }

    @PostMapping("/artisti/update")
    public String updateArtisti(Model model, Long id) {
        model.addAttribute("artista", repo.getReferenceById(id));
        return "artisti/edit";
    }

}
