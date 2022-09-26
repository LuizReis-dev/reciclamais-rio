package dao;

import entidades.Bonificacao;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;

public class BonificacaoDao {
    
    public static int totalBonificacaoPorCatador(int idCatador, int idMaterial) {
        int contagem = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT sum(quantidade_referente) AS contagem FROM bonificacao INNER JOIN materias_em_op ON bonificacao.id_mat_em_op = materias_em_op.id INNER JOIN operacao_comercial on materias_em_op.id_operacao_comercial = operacao_comercial.id WHERE operacao_comercial.id_catador = ? AND materias_em_op.id_material = ?;");
            ps.setInt(1, idCatador);
            ps.setInt(2, idMaterial);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                contagem = rs.getInt("contagem");
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return contagem;
    }
    public static int inserirBonificacao(Bonificacao bonificacao) {
        int status = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("INSERT INTO BONIFICACAO(VALOR,ID_MAT_EM_OP, STATUS, QUANTIDADE_REFERENTE) VALUES(?,?,?,?)");
            ps.setDouble(1, bonificacao.getValor());
            ps.setInt(2, bonificacao.getMatEmOp().getId());
            ps.setString(3, bonificacao.getStatus());
            ps.setInt(4, bonificacao.getQuantidadeReferente());

            status = ps.executeUpdate();
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return status;
    }
}
