package edu.unict.magazzon;

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

@WebServlet("/magazzon")
public class webapp extends HttpServlet {

    Connection connection;
    final String CONNECTION = "jdbc:mysql://localhost:3306";

    public void init() {

        System.out.println("Servlet has started" + this.getServletName());

        try {
            connection = DriverManager.getConnection(CONNECTION);
            System.out.println("Connection ready");
        } catch (Exception e) {
            System.out.println("Error while connecting to database");
            System.out.println("SQLException: " + e.getMessage());
            // System.out.println("SQLState: " + e.getSQLState());
            // System.out.println("VendorError: " + e.getErrorCode());
            return;
        }

    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException {
        PrintWriter out;
        ResultSet result;

        response.setContentType("text/html");
        out = response.getWriter();
        out.println("<html><head>Magazzon</head><body>");
        out.println("<h1> Benvenuti in Magazzon </h1>");

        String action;
        action = request.getParameter("action");

        if (action != null && action.equals("delete")) {
            System.out.println("Delete");
        }

        String query = "select * from products";

        try {
            Statement stmt = connection.createStatement();
            result = stmt.executeQuery(query);

            while (result.next()) {
                int id = result.getInt("id");
                out.println(result.getString("name"));
                out.println(result.getInt("quantity"));
                out.println(result.getInt("price"));
                out.println("<a href='/magazzon?action=delete&id='" + id + "> Delete </a>");
            }
        } catch (Exception e) {
        }

        out.println("<h1>Insert a new product</h1>");
        out.println("<form action='/magazzon' method='post'>");
        out.println("<input type='text' name='name' value='name'/>");
        out.println("<input type='text' name='quantity' value='quantity'/>");
        out.println("<input type='text' name='price' value='price'/>");
        out.println("<input type='submit' value='Create'/>");
        out.println("</form>");
    }

    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException {
        String name = request.getParameter("name");
        Integer quantity = Integer.parseInt(request.getParameter("quantity"));
        Float price = Float.parseFloat(request.getParameter("price"));
        System.out.println("Name: " + name + "Quantity: " + quantity + "Price: " + price);
        PrintWriter out = null;
        response.setContentType("text/html");
        out = response.getWriter();
        String query = "insert in products(name,quantity,price) values (???)";
        try {
            PreparedStatement stmt = connection.prepareStatement(query);
            stmt.setString(1, name);
            stmt.setInt(2, quantity);
            stmt.setFloat(3, price);
            int rows = stmt.executeUpdate();
            out.write("Successfully rows added: " + rows);
        } catch (SQLException e) {
        }

        out.write("<a href='/'>Back to home</a>");
    }

}
