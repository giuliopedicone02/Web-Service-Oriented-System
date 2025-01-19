package edu.unict.moda.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import edu.unict.moda.Model.Brand;
import edu.unict.moda.Repositories.BrandRepository;

@Controller
public class BrandController {
    private final BrandRepository repo;

    public BrandController(BrandRepository repo) {
        this.repo = repo;
    }

    @GetMapping("/brand")
    public String getMethodName(Model model) {
        model.addAttribute("brands", repo.findAll());
        return "brand/list";
    }

    @PostMapping("/brand/add")
    public String addBrand(Brand brand) {
        repo.save(brand);
        return "redirect:/brand";
    }

    @PostMapping("/brand/delete")
    public String deleteBrand(Long id) {
        repo.deleteById(id);
        return "redirect:/brand";
    }

    @PostMapping("/brand/update")
    public String editBrand(Model model, Long id) {
        model.addAttribute("brand", repo.getReferenceById(id));
        return "brand/edit";
    }

}
