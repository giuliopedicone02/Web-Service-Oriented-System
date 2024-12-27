package edu.unict.wsos.prodotti.data;

import org.springframework.data.jpa.repository.JpaRepository;

import edu.unict.wsos.prodotti.models.Prodotti;

public interface ProdottiRepository extends JpaRepository<Prodotti, Long> {

}
