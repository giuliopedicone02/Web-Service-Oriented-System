package edu.unict.wsos.aeroporti.Repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import edu.unict.wsos.aeroporti.Model.Compagnia;
import edu.unict.wsos.aeroporti.Model.Tratta;

public interface TrattaRepository extends JpaRepository<Tratta, Long> {
    List<Tratta> findByCompagniaId(Compagnia compagniaId);

    List<Tratta> findByDestinazione(String destinazione);
}
