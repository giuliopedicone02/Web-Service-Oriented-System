package wiz.hogwartsos.sortinghack.controllers;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;

import wiz.hogwartsos.sortinghack.models.langhouse;
import wiz.hogwartsos.sortinghack.repositories.langhouseRepository;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;




@Controller
public class langhouseController {

    private final langhouseRepository repository;

    public langhouseController(langhouseRepository repository) {
        this.repository = repository;
    }

    @GetMapping("/langhouses")
    public String read(Model model) {
        model.addAttribute("langhouses", repository.findAll());
        return("langhouses/list");
    }

    @GetMapping("/langhouses/new")
    public String create(Model model) {
        model.addAttribute("langhouse", new langhouse());
        return("langhouses/edit");
    }

    @GetMapping("/langhouses/{id}/edit")
    public String edit(@PathVariable Long id, Model model) {
        model.addAttribute("langhouse", repository.getReferenceById(id));
        return("langhouses/edit");
    }
    
    @GetMapping("/langhouses/{id}/delete")
    public String delete(@PathVariable Long id, Model model) {
        langhouse langhouse = repository.getReferenceById(id);
        repository.delete(langhouse);
        return("redirect:/langhouses");
    }
    

    @PostMapping("/langhouses")
    public String cr(@ModelAttribute langhouse house,Model model) {
        repository.save(house);
        return("redirect:/langhouses");
    }
    
    
}
