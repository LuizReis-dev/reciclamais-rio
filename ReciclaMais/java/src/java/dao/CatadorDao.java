package dao;

import java.util.List;
import entidades.Catador;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;

public class CatadorDao {

    public static List<Catador> getCatadores(int inicio, int total) {
        List<Catador> list = new ArrayList<Catador>();
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT id, nome, data_de_nascimento, cpf FROM catador ORDER BY id LIMIT " + (inicio - 1) + ", " + total);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                Catador catador = new Catador();
                catador.setId(rs.getInt("id"));
                catador.setNome(rs.getString("nome"));
                catador.setData_de_nascimento(rs.getDate("data_de_nascimento"));
                catador.setCpf(rs.getString("cpf"));
                list.add(catador);
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return list;
    }

    public static int getContagem() {
        int contagem = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT count(*) AS contagem FROM catador");
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                contagem = rs.getInt("contagem");
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return contagem;
    }

    public static Catador getCatadorById(int id) {
        Catador catador = null;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("select * from catador where id=?");
            ps.setInt(1, id);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                catador = new Catador();
                catador.setId(rs.getInt("id"));
                catador.setNome(rs.getString("nome"));
                catador.setCpf(rs.getString("cpf"));
                catador.setEndereco(rs.getString("endereco"));
                catador.setEmail(rs.getString("email"));
                catador.setTelefone(rs.getString("telefone"));

            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return catador;
    }

    public static int editarCatador(Catador catador) {
        int status = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("UPDATE catador SET nome=?, cpf=?, endereco=?, email=?, telefone=? WHERE id=?");
            ps.setString(1, catador.getNome());
            ps.setString(2, catador.getCpf());
            ps.setString(3, catador.getEndereco());
            ps.setString(4, catador.getEmail());
            ps.setString(5, catador.getTelefone());
            ps.setInt(6, catador.getId());

            status = ps.executeUpdate();
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return status;
    }

    public static List<Catador> getCatador() {
        List<Catador> list = new ArrayList<Catador>();
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT * FROM catador");
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                Catador catador = new Catador();
                catador.setId(rs.getInt("id"));
                catador.setNome(rs.getString("nome"));
                catador.setCpf(rs.getString("cpf"));
                catador.setEndereco(rs.getString("endereco"));
                catador.setData_de_nascimento(rs.getDate("data_de_nascimento"));
                catador.setEmail(rs.getString("email"));
                catador.setTelefone(rs.getString("telefone"));
                list.add(catador);
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return list;
    }

    public static int excluirCatador(Catador catador) {
        int status = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("DELETE FROM catador WHERE id=?");
            ps.setInt(1, catador.getId());

            status = ps.executeUpdate();
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return status;
    }

    public static int cadastrarCatador(Catador catador) {
        int status = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("INSERT INTO CATADOR(NOME,CPF, ENDERECO, EMAIL, TELEFONE) VALUES(?,?,?,?,?)");
            ps.setString(1, catador.getNome());
            ps.setString(2, catador.getCpf());
            ps.setString(3, catador.getEndereco());
            ps.setString(4, catador.getEmail());
            ps.setString(5, catador.getTelefone());

            status = ps.executeUpdate();
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return status;
    }
}
