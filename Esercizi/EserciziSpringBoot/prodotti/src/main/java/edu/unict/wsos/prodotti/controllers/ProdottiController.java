package edu.unict.wsos.prodotti.controllers;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import edu.unict.wsos.prodotti.data.ProdottiRepository;
import edu.unict.wsos.prodotti.models.Prodotti;

@Controller
@RequestMapping("/")
public class ProdottiController {

    private final ProdottiRepository repo;

    public ProdottiController(ProdottiRepository repo) {
        this.repo = repo;
    }

    @GetMapping("/")
    public String getProdotti(Model model) {
        model.addAttribute("prodotti", repo.findAll());
        return "index";
    }

    @PostMapping("/elimina")
    public String delete(Long id) {
        repo.deleteById(id);
        return "redirect:/";
    }

    @PostMapping("/modifica")
    public String getProdotto(Model model, Long id) {
        model.addAttribute("prodotti", repo.getReferenceById(id));
        return "modifica";
    }

    @PostMapping("/create")
    public String create(Prodotti prodotto) {
        repo.save(prodotto);
        return "redirect:/";
    }

    @PostMapping("/update")
    public String update(Prodotti prodotto) {
        repo.save(prodotto);
        return "redirect:/";
    }

}
