package film;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

@WebServlet("/film")
public class esame extends HttpServlet {

    private Connection connection;

    @Override
    public void init() {
        final String CONNECTION_STRING = "jdbc:mysql://localhost:3306/FilmDatabase";
        final String username = "root";
        final String password = "Giulio2002!";

        try {
            connection = DriverManager.getConnection(CONNECTION_STRING, username, password);
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    @Override
    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException {
        PrintWriter out;
        response.setContentType("text/html");
        out = response.getWriter();

        out.println(("""
                    <html>
                        <head>
                            <title> Catalogo Film </title>
                        </head>
                        <body>
                            <h1> <center> Film Database </center> </h1>
                """));

        out.println("<h3> Cerca un film </h3>");

        out.println("""
                    <form action="/film" method="post">
                        <span> Cerca per nome film: </span>
                        <input type="text" name="nome" placeholder="Nome Film"><br/>
                        <span> Cerca per nome regista: </span>
                        <input type="text" name="regista" placeholder="Nome Regista"><br/>
                        <span> Cerca per anno: </span>
                        <input type="number" name="anno" placeholder="Anno"><br/>
                        <input type="submit" name="action" value="Cerca">
                    </form>
                """);

        String query = "SELECT * FROM Film";

        out.println("<h3> Lista Film </h3>");

        try (Statement stmt = connection.createStatement()) {
            ResultSet result = stmt.executeQuery(query);

            while (result.next()) {

                int anno = Integer.parseInt(result.getString("anno_uscita"));

                out.println("<br/>");
                out.println("<b> Nome Film: </b> " + result.getString("nome_film"));
                out.println("<b> Nome Regista: </b> " + result.getString("nome_regista"));
                if (anno >= 2008) {
                    out.println("<b> Anno di uscita: </b> <span style='color:green'>" + anno + "</span>");
                } else {
                    out.println("<b> Anno di uscita: </b> <span style='color:red'>" + anno + "</span>");
                }
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }

        out.println("<h3> Aggiungi un nuovo film </h3>");

        out.println("""
                    <form action="/film" method="post">
                        <span> Inserisci nome film: </span>
                        <input type="text" name="nome" placeholder="Nome Film" required><br/>
                        <span> Inserisci nome regista: </span>
                        <input type="text" name="regista" placeholder="Nome Regista" required><br/>
                        <span> Inserisci anno: </span>
                        <input type="number" name="anno" placeholder="Anno" required><br/>
                        <input type="submit" name="action" value="Invia">
                    </form>
                """);
    }

    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        String richiesta = request.getParameter("action");

        // Create
        if (richiesta.equals("Invia")) {

            String nome = request.getParameter("nome");
            String regista = request.getParameter("regista");
            int anno = Integer.parseInt(request.getParameter("anno"));

            String query = "INSERT INTO Film(nome_film, nome_regista, anno_uscita) VALUES (?, ?, ?)";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setString(1, nome);
                stmt.setString(2, regista);
                stmt.setInt(3, anno);

                int rows = stmt.executeUpdate();
                out.println("Inserimento riuscito. Righe modificate: " + rows);
            } catch (SQLException e) {
                e.printStackTrace();
            }

            out.println("<br/> <a href='/film'> Torna alla Home </a>");
        }

        if (richiesta.equals("Cerca")) {

            String nome = request.getParameter("nome");
            String regista = request.getParameter("regista");
            String anno_uscita = request.getParameter("anno");

            int anno = 0;
            if (!anno_uscita.equals("")) {
                anno = Integer.parseInt(anno_uscita);
            }

            String query = "SELECT * FROM Film";
            boolean condizione = false;

            if (!nome.equals("")) {

                if (!condizione) {
                    query += " WHERE ";
                    condizione = true;
                } else {
                    query += " AND ";
                }
                query += "nome_film = '" + nome + "'";
            }

            if (!regista.equals("")) {
                if (!condizione) {
                    query += " WHERE ";
                    condizione = true;
                } else {
                    query += " AND ";
                }
                query += "nome_regista = '" + regista + "'";
            }

            if (anno > 0) {
                if (!condizione) {
                    query += " WHERE ";
                } else {
                    query += " AND ";
                }
                query += "anno_uscita = " + anno;
            }

            try (Statement stmt = connection.createStatement(); ResultSet result = stmt.executeQuery(query)) {

                out.println("<h2>Lista film disponibili:</h2>");
                boolean entra = false;

                while (result.next()) {
                    String nomeFilm = result.getString("nome_film");
                    String nomeRegista = result.getString("nome_regista");
                    int annoUscita = result.getInt("anno_uscita");
                    int id = result.getInt("id");

                    out.println("<form  action='/film' method='post' >");
                    out.println("Nome Film: " + nomeFilm + "<br>");
                    out.println("Nome Regista: " + nomeRegista + "<br>");
                    out.println("Anno di Uscita: " + annoUscita + "<br>");
                    out.println("<input type='hidden' name='id' value='" + id + "' >");

                    out.println("<input type='submit' name='action' value='Modifica'>");
                    out.println("<input type='submit' name='action' value='Elimina'><br>");
                    out.print("</form>");
                    out.println("<br>");

                    entra = true;
                }

                if (!entra) {
                    out.println("Non ci sono film con questi parametri! <br>");
                }

                out.println("<a href='/film'>Torna alla home!</a>");

            } catch (SQLException e) {

                e.printStackTrace();
            }

        }

        // Delete
        if (richiesta.equals("Elimina")) {
            String idE = request.getParameter("id");

            String queryE = "DELETE FROM Film WHERE id = ?";

            try (PreparedStatement stmt = connection.prepareStatement(queryE)) {
                stmt.setString(1, idE);
                int rows = stmt.executeUpdate();

                out.write("FILM ELIMINATO CON SUCCESSO. Righe modificate: " + rows);

            } catch (SQLException e) {
                out.write("Errore durante l'elimiazione del film");
                e.printStackTrace();
            }

            out.println("<br/> <a href='/film'>Torna alla home!</a>");

        }

        // Update
        if (richiesta.equals("Modifica")) {
            int id = Integer.parseInt(request.getParameter("id"));

            String query = "SELECT * FROM Film WHERE id = ?";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setInt(1, id);
                ResultSet result = stmt.executeQuery();

                if (result.next()) {
                    out.println("<form action='/film' method='post'>");

                    out.println("<input type='hidden' name = 'id' value='" + id + "'>");

                    out.println("<span> Modifica nome film: </span>");
                    out.println("<input type='text' name='nome' value='" + result.getString("nome_film") + "'><br/>");
                    out.println("<span> Modifica nome regista: </span>");
                    out.println(
                            "<input type='text' name='regista' value='" + result.getString("nome_regista") + "'><br/>");
                    out.println("<span> Modifica anno: </span>");
                    out.println("<input type='number' name='anno' value='" + result.getInt("anno_uscita") + "'><br/>");
                    out.println("<input type='submit' name='action' value='Update'><br/>");
                    out.println("</form>");
                }

            } catch (SQLException e) {
                e.printStackTrace();
            }
        }

        if (richiesta.equals("Update")) {
            String nome_film = request.getParameter("nome");
            String nome_regista = request.getParameter("regista");
            int anno = Integer.parseInt(request.getParameter("anno"));
            int id = Integer.parseInt(request.getParameter("id"));

            String query = "UPDATE Film SET nome_film=?, nome_regista=?, anno_uscita=? WHERE id = ?";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setString(1, nome_film);
                stmt.setString(2, nome_regista);
                stmt.setInt(3, anno);
                stmt.setInt(4, id);

                int rows = stmt.executeUpdate();
                out.println("Film modificato con successo, numero di righe modificate: " + rows + "<br>");
            } catch (SQLException e) {
                out.println("Errore, non è stato possibile modificare il film");
                e.printStackTrace();
            }

            out.println("<a href='/film'>Torna alla home!</a>");
        }
    }

    @Override
    public void destroy() {
        try {
            connection.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}