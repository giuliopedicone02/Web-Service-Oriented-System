package edu.unict.moda.Repositories;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import edu.unict.moda.Model.Abbigliamento;
import edu.unict.moda.Model.Brand;

public interface AbbigliamentoRepository extends JpaRepository<Abbigliamento, Long> {

    List<Abbigliamento> findByBrandId(Brand brand);

}
