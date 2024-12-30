package edu.unict.wsos.veicoli.Data;

import org.springframework.data.jpa.repository.JpaRepository;

import edu.unict.wsos.veicoli.Model.Veicoli;

public interface VeicoliRepository extends JpaRepository<Veicoli, Long> {

}
