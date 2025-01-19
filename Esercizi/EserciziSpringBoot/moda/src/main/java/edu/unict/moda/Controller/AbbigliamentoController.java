package edu.unict.moda.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import edu.unict.moda.Model.Abbigliamento;
import edu.unict.moda.Model.Brand;
import edu.unict.moda.Repositories.AbbigliamentoRepository;
import edu.unict.moda.Repositories.BrandRepository;

@Controller
public class AbbigliamentoController {

    private final AbbigliamentoRepository abbigliamentoRepository;
    private final BrandRepository brandRepository;

    public AbbigliamentoController(AbbigliamentoRepository abbigliamentoRepository, BrandRepository brandRepository) {
        this.abbigliamentoRepository = abbigliamentoRepository;
        this.brandRepository = brandRepository;
    }

    @GetMapping("/abbigliamento")
    public String getAbbigliamento(Model model) {
        model.addAttribute("abbigliamenti", abbigliamentoRepository.findAll());
        model.addAttribute("brands", brandRepository.findAll());
        return "abbigliamento/list";
    }

    @PostMapping("/abbigliamento/add")
    public String addAbbigliamento(Abbigliamento abbigliamento) {
        abbigliamentoRepository.save(abbigliamento);
        return "redirect:/abbigliamento";
    }

    @PostMapping("/abbigliamento/delete")
    public String eliminaAbbigliamento(Long id) {
        abbigliamentoRepository.deleteById(id);
        return "redirect:/abbigliamento";
    }

    @PostMapping("/abbigliamento/update")
    public String aggiornaAbbigliamento(Model model, Long id) {
        model.addAttribute("abbigliamenti", abbigliamentoRepository.getReferenceById(id));
        model.addAttribute("brands", brandRepository.findAll());
        return "abbigliamento/edit";
    }

    @PostMapping("/abbigliamento/findByBrand")
    public String findByBrand(Model model, Long id) {
        model.addAttribute("abbigliamenti", abbigliamentoRepository.findByBrandId(id));
        model.addAttribute("brands", brandRepository.findAll());
        return "abbigliamento/list";
    }

}
