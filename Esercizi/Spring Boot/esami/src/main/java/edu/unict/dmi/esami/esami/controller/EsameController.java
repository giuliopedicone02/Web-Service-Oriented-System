package edu.unict.dmi.esami.esami.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

import edu.unict.dmi.esami.esami.data.EsamiRepository;


@Controller
public class EsameController {

    
    private final EsamiRepository repo;

    public EsameController(EsamiRepository repo) {
        this.repo = repo;
    }
    @GetMapping("/")
    public String index (Model model) {

    model.addAttribute("esami",repo.findAll());

    return "index";
   



}
    
}
